require('./bootstrap');
import Swal from 'sweetalert2';
window.Swal = Swal;
require('./app/users.js');
require('./app/tags.js');
require('./app/posts.js');
require('./app/new_post.js');
require('./app/edit_post.js');
require('./app/change_password.js');
