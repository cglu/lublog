(function(){ 
   //Section 1 : 按下自定义按钮时执行的代码 
    var a= { 
        exec:function(editor){ 
            var articlesummary='<div class="page-break-anchor"></div>';
           CKEDITOR.instances.content.insertHtml(articlesummary);
        } 
    }, 
    //Section 2 : 创建自定义按钮、绑定方法 
    b='articlesummary'; 
    CKEDITOR.plugins.add(b,{ 
        init:function(editor){ 
            editor.addCommand(b,a); 
            editor.ui.addButton('articlesummary',{ 
                label:'插入文章摘要标记', 
                 icon: this.path + 'account_summary_details_document_report_file_paper.png', 
                command:b 
            }); 
        } 
    }); 
})(); 