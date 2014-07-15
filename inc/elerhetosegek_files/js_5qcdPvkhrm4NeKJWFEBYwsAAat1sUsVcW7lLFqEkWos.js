Drupal.locale = { 'pluralFormula': function ($n) { return Number(($n!=1)); }, 'strings': {"":{"An AJAX HTTP error occurred.":"Egy AJAX HTTP hiba k\u00f6vetkezett be.","HTTP Result Code: !status":"HTTP eredm\u00e9nyk\u00f3d: !status","An AJAX HTTP request terminated abnormally.":"Az AJAX HTTP k\u00e9r\u00e9s rendellenesen megszakadt.","Debugging information follows.":"A hibakeres\u00e9si inform\u00e1ci\u00f3k k\u00f6vetkeznek.","Path: !uri":"\u00datvonal: !uri","StatusText: !statusText":"\u00c1llapot\u00fczenet: !statusText","ResponseText: !responseText":"V\u00e1lasz\u00fczenet: !responseText","ReadyState: !readyState":"K\u00e9sz\u00fclts\u00e9g: !readyState","Configure":"Be\u00e1ll\u00edt\u00e1s","Hide":"Elrejt","Show":"Megjelen\u00edt\u00e9s","Edit":"Szerkeszt\u00e9s","(active tab)":"(akt\u00edv f\u00fcl)","Requires a title":"Sz\u00fcks\u00e9ges egy c\u00edm","Not published":"Rejtett","Don\u0027t display post information":"Ne jelen\u00edtse meg a bek\u00fcld\u00e9si inform\u00e1ci\u00f3t","Re-order rows by numerical weight instead of dragging.":"A sorok \u00fajrarendez\u00e9se h\u00faz\u00e1s helyett numerikus s\u00falyuk alapj\u00e1n.","Show row weights":"A sorok s\u00faly\u00e1nak mutat\u00e1sa","Hide row weights":"A sorok s\u00faly\u00e1nak elrejt\u00e9se","Drag to re-order":"\u00c1trendez\u00e9s h\u00faz\u00e1ssal","Changes made in this table will not be saved until the form is submitted.":"A t\u00e1bl\u00e1zaton v\u00e9grehajtott v\u00e1ltoztat\u00e1sok az \u0171rlap bek\u00fcld\u00e9s\u00e9ig nem lesznek elmentve.","Show shortcuts":"Gyorshivatkoz\u00e1sok mutat\u00e1sa","Also allow !name role to !permission?":"!name szerepk\u00f6rt is enged\u00e9lyezze !permission jogosults\u00e1ghoz?","Add":"Hozz\u00e1ad\u00e1s","Allowed HTML tags":"Enged\u00e9lyezett HTML elemek","Select all rows in this table":"A t\u00e1bl\u00e1zat minden sor\u00e1nak kiv\u00e1laszt\u00e1sa","Deselect all rows in this table":"A kiv\u00e1laszt\u00e1s megsz\u00fcntet\u00e9se a t\u00e1bl\u00e1zat minden sor\u00e1ban","Please wait...":"K\u00e9rem v\u00e1rjon...","By @name on @date":"Szerz\u0151: @name (@date)","By @name":"Szerz\u0151: @name","Not in menu":"Nincs men\u00fcben","Alias: @alias":"\u00c1ln\u00e9v: @alias","No alias":"Nincs \u00e1ln\u00e9v","New revision":"\u00daj v\u00e1ltozat","The changes to these blocks will not be saved until the \u003Cem\u003ESave blocks\u003C\/em\u003E button is clicked.":"A blokkok v\u00e1ltoz\u00e1sai nem lesznek elmentve a \u003Cem\u003EBlokk ment\u00e9se\u003C\/em\u003E nyom\u00f3gombra kattint\u00e1sig.","This permission is inherited from the authenticated user role.":"Ezt a szerepk\u00f6rt minden azonos\u00edtott felhaszn\u00e1l\u00f3 megkapja.","No revision":"Nincs v\u00e1ltozat","Not restricted":"Nem korl\u00e1tozott","Not customizable":"Nem testreszabhat\u00f3","Restricted to certain pages":"Bizonyos oldalakra korl\u00e1tozva","The block cannot be placed in this region.":"A blokk nem helyezhet\u0151 el ebbe a r\u00e9gi\u00f3ba.","Hide summary":"\u00d6sszefoglal\u00f3 elrejt\u00e9se","Edit summary":"\u00d6sszefoglal\u00f3 szerkeszt\u00e9se","The selected file %filename cannot be uploaded. Only files with the following extensions are allowed: %extensions.":"%filename kiv\u00e1lasztott f\u00e1jl nem t\u00f6lthet\u0151 fel. Csak a k\u00f6vetkez\u0151 kiterjeszt\u00e9sek egyik\u00e9vel rendelkez\u0151 f\u00e1jlok t\u00f6lthet\u0151ek fel: %extensions.","Autocomplete popup":"Automatikusan kieg\u00e9sz\u00edt\u0151 felugr\u00f3 ablak","Searching for matches...":"Egyez\u00e9sek keres\u00e9se...","Hide shortcuts":"Gyorshivatkoz\u00e1sok elrejt\u00e9se","Translatable":"Ford\u00edthat\u00f3","Not translatable":"Nem ford\u00edthat\u00f3","Restricted to certain languages":"Bizonyos nyelvekre korl\u00e1tozva","Automatic alias":"Automatikus \u00e1ln\u00e9v","Available tokens":"El\u00e9rhet\u0151 vez\u00e9rjelek","Insert this token into your form":"A vez\u00e9rjel besz\u00far\u00e1sa az \u0171rlapba","First click a text field to insert your tokens into.":"El\u0151sz\u00f6r r\u00e1 kell kattintani egy sz\u00f6veges mez\u0151re, ahov\u00e1 a vez\u00e9rjelet be kell sz\u00farni.","Loading token browser...":"Vez\u00e9rjel b\u00f6ng\u00e9sz\u0151 bet\u00f6lt\u00e9se...","Remove group":"Csoport t\u00f6rl\u00e9se","Apply (all displays)":"Alkalmaz\u00e1s (minden megjelen\u00edt\u00e9sre)","Apply (this display)":"Alkalmaz\u00e1s (erre a megjelen\u00edt\u00e9sre)","Revert to default":"Visszat\u00e9r\u00e9s az alap\u00e9rtelmez\u00e9shez"}} };;
(function ($) {

$(document).ready(function() {

  // Expression to check for absolute internal links.
  var isInternal = new RegExp("^(https?):\/\/" + window.location.host, "i");

  // Attach onclick event to document only and catch clicks on all elements.
  $(document.body).click(function(event) {
    // Catch the closest surrounding link of a clicked element.
    $(event.target).closest("a,area").each(function() {

      var ga = Drupal.settings.googleanalytics;
      // Expression to check for special links like gotwo.module /go/* links.
      var isInternalSpecial = new RegExp("(\/go\/.*)$", "i");
      // Expression to check for download links.
      var isDownload = new RegExp("\\.(" + ga.trackDownloadExtensions + ")$", "i");

      // Is the clicked URL internal?
      if (isInternal.test(this.href)) {
        // Skip 'click' tracking, if custom tracking events are bound.
        if ($(this).is('.colorbox')) {
          // Do nothing here. The custom event will handle all tracking.
        }
        // Is download tracking activated and the file extension configured for download tracking?
        else if (ga.trackDownload && isDownload.test(this.href)) {
          // Download link clicked.
          var extension = isDownload.exec(this.href);
          _gaq.push(["_trackEvent", "Downloads", extension[1].toUpperCase(), this.href.replace(isInternal, '')]);
        }
        else if (isInternalSpecial.test(this.href)) {
          // Keep the internal URL for Google Analytics website overlay intact.
          _gaq.push(["_trackPageview", this.href.replace(isInternal, '')]);
        }
      }
      else {
        if (ga.trackMailto && $(this).is("a[href^='mailto:'],area[href^='mailto:']")) {
          // Mailto link clicked.
          _gaq.push(["_trackEvent", "Mails", "Click", this.href.substring(7)]);
        }
        else if (ga.trackOutbound && this.href.match(/^\w+:\/\//i)) {
          if (ga.trackDomainMode == 2 && isCrossDomain(this.hostname, ga.trackCrossDomains)) {
            // Top-level cross domain clicked. document.location is handled by _link internally.
            event.preventDefault();
            _gaq.push(["_link", this.href]);
          }
          else {
            // External link clicked.
            _gaq.push(["_trackEvent", "Outbound links", "Click", this.href]);
          }
        }
      }
    });
  });

  // Colorbox: This event triggers when the transition has completed and the
  // newly loaded content has been revealed.
  $(document).bind("cbox_complete", function() {
    var href = $.colorbox.element().attr("href");
    if (href) {
      _gaq.push(["_trackPageview", href.replace(isInternal, '')]);
    }
  });

});

/**
 * Check whether the hostname is part of the cross domains or not.
 *
 * @param string hostname
 *   The hostname of the clicked URL.
 * @param array crossDomains
 *   All cross domain hostnames as JS array.
 *
 * @return boolean
 */
function isCrossDomain(hostname, crossDomains) {
  /**
   * jQuery < 1.6.3 bug: $.inArray crushes IE6 and Chrome if second argument is
   * `null` or `undefined`, http://bugs.jquery.com/ticket/10076,
   * https://github.com/jquery/jquery/commit/a839af034db2bd934e4d4fa6758a3fed8de74174
   *
   * @todo: Remove/Refactor in D8
   */
  if (!crossDomains) {
    return false;
  }
  else {
    return $.inArray(hostname, crossDomains) > -1 ? true : false;
  }
}

})(jQuery);
;
