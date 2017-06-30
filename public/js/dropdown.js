var dropdown;

function init() {
  dropdown = document.getElementById('d-auth');
  if (dropdown == null) {
    dropdown = document.getElementById('d-notauth');
  }
}

function toggle() {
  dropdown.classList.toggle('visible');
}
