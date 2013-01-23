/* =============================================================
 * ios-orientation-change-fix.js v1.0.0
 * Fixes the auto-zoom bug in iOS when going from portrait to landscape mode
 * =============================================================
 * Script by @scottjehl, rebound by @wilto
 * https://github.com/scottjehl/iOS-Orientationchange-Fix
 * MIT / GPLv2 License
 * ============================================================= */

(function(w){
	
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	var ua = navigator.userAgent;
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && /OS [1-5]_[0-9_]* like Mac OS X/i.test(ua) && ua.indexOf( "AppleWebKit" ) > -1 ) ){
		return;
	}

    var doc = w.document;

    if( !doc.querySelector ){ return; }

    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;

    if( !meta ){ return; }

    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true;
    }

    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false;
    }
	
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
				
		// If portrait orientation and in one of the danger zones
        if( (!w.orientation || w.orientation === 180) && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){
				disableZoom();
			}        	
        }
		else if( !enabled ){
			restoreZoom();
        }
    }
	
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );

})( this );



/* =============================================================
 * fitvids.js v1.0.0
 * Auto resizes embedded videos to fit the screen size
 * =============================================================
 * Copyright 2011, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
 * Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
 * Released under the WTFPL license - http://sam.zoy.org/wtfpl/
 * ============================================================= */

(function( $ ){

  $.fn.fitVids = function( options ) {
    var settings = {
      customSelector: null
    }
    
    var div = document.createElement('div'),
        ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0];
        
  	div.className = 'fit-vids-style';
    div.innerHTML = '&shy;<style>         \
      .fluid-width-video-wrapper {        \
         width: 100%;                     \
         position: relative;              \
         padding: 0;                      \
      }                                   \
                                          \
      .fluid-width-video-wrapper iframe,  \
      .fluid-width-video-wrapper object,  \
      .fluid-width-video-wrapper embed {  \
         position: absolute;              \
         top: 0;                          \
         left: 0;                         \
         width: 100%;                     \
         height: 100%;                    \
      }                                   \
    </style>';
                      
    ref.parentNode.insertBefore(div,ref);
    
    if ( options ) { 
      $.extend( settings, options );
    }
    
    return this.each(function(){
      var selectors = [
        "iframe[src*='player.vimeo.com']", 
        "iframe[src*='www.youtube.com']",  
        "iframe[src*='www.kickstarter.com']", 
        "object", 
        "embed"
      ];
      
      if (settings.customSelector) {
        selectors.push(settings.customSelector);
      }
      
      var $allVideos = $(this).find(selectors.join(','));

      $allVideos.each(function(){
        var $this = $(this);
        if (this.tagName.toLowerCase() == 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) { return; } 
        var height = this.tagName.toLowerCase() == 'object' ? $this.attr('height') : $this.height(),
            aspectRatio = height / $this.width();
		if(!$this.attr('id')){
			var videoID = 'fitvid' + Math.floor(Math.random()*999999);
			$this.attr('id', videoID);
		}
        $this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
        $this.removeAttr('height').removeAttr('width');
      });
    });
  
  }
})( jQuery );
$(".container").fitVids();



/* =============================================================
 * bootstrap-collapse.js v2.0.0
 * Powers the small screen drop-down menu
 * http://twitter.github.com/bootstrap/javascript.html#collapse
 * =============================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ============================================================ */

!function( $ ){

  "use strict"

  var Collapse = function ( element, options ) {
  	this.$element = $(element)
    this.options = $.extend({}, $.fn.collapse.defaults, options)

    if (this.options["parent"]) {
      this.$parent = $(this.options["parent"])
    }

    this.options.toggle && this.toggle()
  }

  Collapse.prototype = {

    constructor: Collapse

  , dimension: function () {
      var hasWidth = this.$element.hasClass('width')
      return hasWidth ? 'width' : 'height'
    }

  , show: function () {
      var dimension = this.dimension()
        , scroll = $.camelCase(['scroll', dimension].join('-'))
        , actives = this.$parent && this.$parent.find('.in')
        , hasData

      if (actives && actives.length) {
        hasData = actives.data('collapse')
        actives.collapse('hide')
        hasData || actives.data('collapse', null)
      }

      this.$element[dimension](0)
      this.transition('addClass', 'show', 'shown')
      this.$element[dimension](this.$element[0][scroll])

    }

  , hide: function () {
      var dimension = this.dimension()
      this.reset(this.$element[dimension]())
      this.transition('removeClass', 'hide', 'hidden')
      this.$element[dimension](0)
    }

  , reset: function ( size ) {
      var dimension = this.dimension()

      this.$element
        .removeClass('collapse')
        [dimension](size || 'auto')
        [0].offsetWidth

      this.$element.addClass('collapse')
    }

  , transition: function ( method, startEvent, completeEvent ) {
      var that = this
        , complete = function () {
            if (startEvent == 'show') that.reset()
            that.$element.trigger(completeEvent)
          }

      this.$element
        .trigger(startEvent)
        [method]('in')

      $.support.transition && this.$element.hasClass('collapse') ?
        this.$element.one($.support.transition.end, complete) :
        complete()
  	}

  , toggle: function () {
      this[this.$element.hasClass('in') ? 'hide' : 'show']()
  	}

  }

  /* COLLAPSIBLE PLUGIN DEFINITION
  * ============================== */

  $.fn.collapse = function ( option ) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('collapse')
        , options = typeof option == 'object' && option
      if (!data) $this.data('collapse', (data = new Collapse(this, options)))
      if (typeof option == 'string') data[option]()
    })
  }

  $.fn.collapse.defaults = {
    toggle: true
  }

  $.fn.collapse.Constructor = Collapse


 /* COLLAPSIBLE DATA-API
  * ==================== */

  $(function () {
    $('body').on('click.collapse.data-api', '[data-toggle=collapse]', function ( e ) {
      var $this = $(this), href
        , target = $this.attr('data-target')
          || e.preventDefault()
          || (href = $this.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '') //strip for ie7
        , option = $(target).data('collapse') ? 'toggle' : $this.data()
      $(target).collapse(option)
    })
  })

}( window.jQuery )



/* =============================================================
 * accessibility-styles.js v1.0.0
 * Adds 'js' class to body to allow for javascript conditional styling
 * Ensures accessibility of collapsing menu, etc. on all devices
 * =============================================================
 * Copyright 2012 Brad Frost
 * http://codepen.io/bradfrost
 * ============================================================= */

$(function () {
	$('body').addClass('js');
});
