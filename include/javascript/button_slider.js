function enableButtonSlider(divId){YUI({combine:true,timeout:10000,base:"include/javascript/yui3/build/",comboBase:"index.php?entryPoint=getYUIComboFile&"}).use("node","anim",function(Y){var module=Y.one('#'+divId);if(module){var content=module.one('.yui-bd').plug(Y.Plugin.NodeFX,{from:{width:function(node){return node.get('scrollWidth');},opacity:1},to:{width:0,opacity:0},easing:Y.Easing.backIn,duration:0.5});var onClick=function(e){module.toggleClass('yui-closed');content.fx.set('reverse',!content.fx.get('reverse'));content.fx.run();};control=module.query('.yui-hd').query('.toggle');if(control){control.on('click',onClick);}}});}