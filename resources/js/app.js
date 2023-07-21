import './bootstrap.js';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import poper from 'poper';
import { Tooltip, Toast, Popover } from 'bootstrap';
import "./admin/adminlte";

import "./alert";
import { eventListeners } from '@popperjs/core';


import $ from 'jquery';
 
import DataTable from '../../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.mjs';
import Cropper from '../../node_modules/cropperjs';


$(document).ready( function () {
    $('#myTable').DataTable();
});


document.addEventListener('DOMContentLoaded', function () {
    var imageInput = document.getElementById('select-image');
    var image = document.getElementById('image');
    var cropper;

    imageInput.addEventListener('change', function () {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                image.src = e.target.result;
                cropper = new Cropper(image, {
                    aspectRatio: 1, 
                });
            };
            image.style.display = 'block';

            reader.readAsDataURL(file);
        } else {
            image.src = '#';
        }
    });


    window.cropImage = function(id) {
        if (cropper) {
            var croppedData = cropper.getData();
            var croppedCanvas = cropper.getCroppedCanvas();

            var croppedImageData = croppedCanvas.toDataURL();
            var resultImage = document.createElement('img');
            resultImage.src = croppedCanvas.toDataURL();
            
            document.getElementById('cropped-image-' + id).src = resultImage.src;
            document.getElementById("img-data-" + id).value = croppedImageData;

          
             $.ajax({
                type: "POST",
                dataType: "json",
                url: "session",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {'_token': $('meta[name="_token"]').attr('content'),
                    'image_data': croppedImageData,
                    'dynamic_id' : id
                 },
                 
                success: function(data){
                  alert("Image successfully uploaded");
                }
              });
        }
    };
});







