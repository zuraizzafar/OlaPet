require('./bootstrap');

import Swal from 'sweetalert2';
window.Swal = Swal;

import * as FilePond from 'filepond';
window.FilePond = FilePond;

import 'jquery-ui/ui/widgets/datepicker.js';

import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor';

var ready = (callback) => {
  if (document.readyState != "loading") callback();
  else document.addEventListener("DOMContentLoaded", callback);
}

ready(() => { 
    ClassicEditor
        .create(document.querySelector('.wysiwyg'))
        .catch(error => {
            console.log(`error`, error)
        });
});

import {owlCarousel} from "owlcarousel/owl-carousel/owl.carousel";
window.owlCarousel = owlCarousel;