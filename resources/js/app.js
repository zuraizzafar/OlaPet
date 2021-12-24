require('./bootstrap');

import Swal from 'sweetalert2';
window.Swal = Swal;

import * as FilePond from 'filepond';
window.FilePond = FilePond;

import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor';

// ref: https://tobiasahlin.com/blog/move-from-jquery-to-vanilla-javascript/#document-ready

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