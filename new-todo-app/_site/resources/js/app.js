import './bootstrap';

import {createApp} from 'vue';
import Board from './components/Board.vue';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons';
import  { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
library.add( faPlusSquare, faTrash);


const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'New Todo App';

const app = createApp(Board);
app.component('font-awesome-icon', FontAwesomeIcon);
app.component('board', Board)
app.mount('#app')
