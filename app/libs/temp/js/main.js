/*
 * jQuery File Upload Plugin JS Example 8.9.1
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/* global $, window */
$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
        downloadTemplateId: null,
        maxNumberOfFiles: 6,
    downloadTemplate: function (o) {
        var rows = $();
        $.each(o.files, function (index, file) {
            var row = $('<tr class="template-download fade">' +
                '<td><span class="preview"><img src="'+file.url+'" width="80" height="33" /></span></td>' +
                '<td><p class="name"></p>' +
                (file.error ? '<div class="error"></div>' : '') +
                '</td>' +
                '<td><span class="size"></span></td>' +
                '<td><button class="btn btn-danger delete" data-type="DELETE" url="'+ROOT+'product/image_delete/'+file.name+'">'+
                '    <i class="glyphicon glyphicon-trash"></i>'+
                '    <span>Delete</span>'+
                '</button> <input type="checkbox" name="delete" value="1" class="toggle"></td>' +
                '</tr>');
            row.find('.size').text(o.formatFileSize(file.size));
            if (file.error) {
                row.find('.name').text(file.name);
                row.find('.error').text(file.error);
            } else {
                row.find('.name').append($('<a></a>').text(file.name));
                if (file.thumbnailUrl) {
                    row.find('.preview').append(
                        $('<a></a>').append(
                            $('<img>').prop('src', file.thumbnailUrl)
                        )
                    );
                }
                row.find('a')
                    .attr('data-gallery', '')
                    .prop('href', file.url);
                row.find('button.delete')
                    .attr('data-type', file.delete_type)
                    .attr('data-url', file.delete_url);
            }
            rows = rows.add(row);
        });
        return rows;
    },
        url: ROOT+'product/upload'
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

    if (window.location.hostname === 'blueimp.github.io') {
        // Demo settings:
        $('#fileupload').fileupload('option', {
            url: '//jquery-file-upload.appspot.com/',
            // Enable image resizing, except for Android and Opera,
            // which actually support image resizing, but fail to
            // send Blob objects via XHR requests:
            disableImageResize: /Android(?!.*Chrome)|Opera/
                .test(window.navigator.userAgent),
            maxFileSize: 5000000,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
        });
        // Upload server status check for browsers with CORS support:
        if ($.support.cors) {
            $.ajax({
                url: '//jquery-file-upload.appspot.com/',
                type: 'HEAD'
            }).fail(function () {
                $('<div class="alert alert-danger"/>')
                    .text('Upload server currently unavailable - ' +
                            new Date())
                    .appendTo('#fileupload');
            });
        }
    } else {
        // Load existing files:
        $('#fileupload').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            //url: "http://localhost/gst/product/product_images/9",
            url: $('#fileupload').fileupload('option', 'url'),
            dataType: 'json',
            context: $('#fileupload')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            $(this).fileupload('option', 'done')
                .call(this, $.Event('done'), {result: result});
                console.log(result);
        });
    }
    
    jQuery(".tm-input").tagsManager({
        maxTags: 6
    });
    
//    tag.tagsinput({
//        maxTags: 6
//    });
//    
//    var id;
//    
//    $("#categories").change(function() {
//        var value = $(this).val();
//        var tag_exist = $('.tag').map(function(){
//               return $(this).text();
//            }).get();
//            
//        for (var i=0; i<tag_exist.length; i++) {
//            tag.tagsinput('remove', tag_exist[i]);
//        }
//        
//        switch(value) {
//            case 'female':
//                id = 2;
//                break;
//            case 'male':
//                id = 1;
//                break;
//            case 'equipment':
//                id = 3;
//                break;
//        }
//        $('#loading').fadeIn("fast");
//        $.ajax({
//            url: ROOT+"product/get_parts/"+id,
//            dataType: 'json'
//        }).done(function (result) {
//            $.each(result, function(index, value) {
//                tag.tagsinput('add', value.name);
//            });
//            $('#loading').fadeOut("fast");
//        });
//        
//        
//    });
    
    
    
});