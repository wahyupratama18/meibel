require('./bootstrap');

import Alpine from 'alpinejs';
import * as FilePond from 'filepond';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileRename from 'filepond-plugin-file-rename';
import id from 'filepond/locale/id-id.js';

window.Alpine = Alpine;
window.FilePond = FilePond;
FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginFileRename);
FilePond.setOptions(id)

Alpine.start();

window.Swal = require('sweetalert2')
window.AOS = require('aos')
AOS.init();
window.addEventListener('load', AOS.refresh);
/* window.tinymce = require('tinymce')
import 'tinymce/icons/default'
import 'tinymce/themes/silver'
import 'tinymce/skins/ui/oxide/skin.css';

//  Import plugins
import 'tinymce/plugins/advlist';
import 'tinymce/plugins/code';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/emoticons/js/emojis';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/table'; */