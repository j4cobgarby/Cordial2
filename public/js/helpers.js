var returns = [];

function execphp(func) {
  var ret;
  $.ajax({
    url: '/execphp/'+func,
    async:false,
    success: function(data) {
      ret = data;
    }
  })
  return ret;
}
