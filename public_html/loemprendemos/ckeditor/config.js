/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.on('instanceReady',functionToBeExecutedWhenReady);

function functionToBeExecutedWhenReady(){
   $("#cke_9").css("display","none");
   //$("#cke_26").css("display","none");
   CKEDITOR.instances.editor.editable().getFirst().remove();
}
CKEDITOR.editorConfig = function( config ) {
	
	// %REMOVE_START%
	// The configuration options below are needed when running CKEditor from source files.
	config.plugins = 'dialogui,dialog,basicstyles,button,toolbar,notification,clipboard,enterkey,entities,floatingspace,wysiwygarea,indent,indentlist,fakeobjects,link,list,undo,specialchar,xml,ajax,lineutils,widgetselection,widget,codesnippet,codesnippetgeshi,smiley,base64image,blockquote,bbcode,sourcearea';


        config.enterMode = 2; //disabled <p> completely
	//config.skin = 'moonocolor';
	config.skin = 'moono-lisa';

        config.height = 350; 

	//no sirven
	//imageCustomUploader
	//upload file
	//upload image
	//imagebrowser
	//lineheight,mathedit,pastecode,htmlwriter,insertpre,devtools,preview
	//image -> esta mejor otro el de base 64
	//bbcode -> hace el texto HTML!!!!!!! :o
	//horizontalrule
	//sourcearea -> HTML
	//pbckcode -> pide ajax (no c para que sirve pbckcode)
	//listblock no c para que sirve
	//indent,indentlist -> no c para que sirven
	//niftyimages -> personaliza imágenes
	//codemirror cosa rara de varias herramientas de cóidgo, formato, búsqueda, etc...
	//codeTag tag [code] -> está mejor codesnippet
	//richcombo -> quien sabe
	//tab no sirve.
	//liststyle no sirve
	//locationmap no sirve es mejor gg pero intercambiar imágenes
        //lineutils
	
	
	//sirven
	//stylescombo -> No BBC
	//table -> no BBC
	//chart -> no BBC
	//font -> no BBC
	//justify -> no BBC
        //youtube -> no BBC
        //sourcearea -> muestra BBC en pantalla
	
	//faltantes
	//widgetselection,widget,emojione,imgbrowse,imagepaste,imageresize,imagerotate,imageuploader,image2,imageresponsive
	
	// %REMOVE_END%
	//language

	//config.language = 'en';
        config.language = 'es-MX';
		
	// The toolbar groups arrangement, optimized for a single toolbar row.
	
	config.toolbarGroups = [
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'blocks', 'align', 'bidi' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'about' }
	];

	// The default plugins included in the basic setup define some buttons that
	// are not needed in a basic editor. They are removed here.
	config.removeButtons = 'Cut,Copy,Paste,Undo,Redo,Anchor,Strike,Subscript,Superscript';

	// Dialog windows are also simplified.
	config.removeDialogTabs = 'link:advanced';
};
CKEDITOR.on('dialogDefinition', function(event) {
    var dialogName = event.data.name;
    var dialogDefinition = event.data.definition;
    console.log(dialogDefinition );
    //some code here

    if(dialogName == 'base64imageDialog'){ 
      
        //some code here
        /*
        dialogDefinition.onLoad = function () {
            //this.getContentElement("tab-properties","width").disable(); // info is the name of the tab and width is the id of the element inside the tab
            //this.getContentElement("tab-properties","height").disable();
        }*/
    }
});
