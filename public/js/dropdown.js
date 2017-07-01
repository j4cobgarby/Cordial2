var dropdown;
var arrow;

function init() {
  dropdown = document.getElementById('d-auth');
  if (dropdown == null) {
    dropdown = document.getElementById('d-notauth');
  }

  arrow = document.getElementById('arrow');
  arrow.classList.add('default');
}

function toggle() {
  dropdown.classList.toggle('visible');
  arrow.classList.toggle('default');
}
