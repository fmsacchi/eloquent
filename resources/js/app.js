import Alpine from 'alpinejs';
import Swal from 'sweetalert2';

window.Alpine = Alpine;

Alpine.start();
  document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-item-btn');

  deleteButtons.forEach(function(button) {
    button.addEventListener('click', function (e) {
      e.preventDefault();

      const deleteRoute = this.getAttribute('data-delete-route');
      const csrfToken = this.getAttribute('data-csrf-token');
      
      Swal.fire({
        title: 'Are you sure?',
        text: 'This action can not be undone!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#d33',
        reverseButtons: true
      }).then(function (result) {
        if (result.isConfirmed) {
          Swal.fire({
            title: 'Deleting item...',
            text: 'Please wait while we are deleting the item!',
            showConfirmButton: false,
            allowOutsideClick: false,
            willOpen: function () {
              Swal.showLoading();
            }
          });

          var xhr = new XMLHttpRequest();
          xhr.open('DELETE', deleteRoute);
          xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
          xhr.onload = function () {
            if (xhr.status === 200) {
              Swal.fire({
                title: 'Deleted successfully!',
                icon: 'success',
                showConfirmButton: false,
                timer: 1000
              }).then(function () {
                location.reload();
              });
            } else {
              Swal.fire({
                title: 'Error processing!',
                text: 'Please try again!',
                icon: 'error'
              });
            }
          };
          xhr.onerror = function () {
            Swal.fire({
              title: 'Error processing!',
              text: 'Please try again!',
              icon: 'error'
            });
          };
          xhr.send();
        }
      });
    });
        });
    });
