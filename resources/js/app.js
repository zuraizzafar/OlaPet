require('./bootstrap');

import Swal from 'sweetalert2';
window.Swal = Swal;

import * as FilePond from 'filepond';
window.FilePond = FilePond;

import 'jquery-ui/ui/widgets/datepicker.js';

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

import { owlCarousel } from "owlcarousel/owl-carousel/owl.carousel";
window.owlCarousel = owlCarousel;

import "@lottiefiles/lottie-player/dist/lottie-player";

import "chart.js/dist/chart";

import "mdb-ui-kit/js/mdb.min";