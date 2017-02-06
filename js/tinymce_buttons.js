(function() {
  tinymce.create('tinymce.plugins.infobox', {
    init : function(ed, url) {
      ed.addButton('codebutton', {
        title : 'Info Box',
        cmd : 'codebutton',
        image :  url + '/vector-path-square.png'
      });

      ed.addCommand('codebutton', function() {
        var selected_text = ed.selection.getContent();
        var return_text = '';
        return_text = '<div class="info-box">' + selected_text + '</div>';
        ed.execCommand('mceInsertContent', 0, return_text);
      });
    },
    // ... Hidden code
  });
  // Register plugin
  tinymce.PluginManager.add( 'mycodebutton', tinymce.plugins.infobox );
})();
