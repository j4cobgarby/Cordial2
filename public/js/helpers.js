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

function execphp(func, param) {
  var ret;
  $.ajax({
    url: '/execphp/'+func+'/'+param,
    async:false,
    success: function(data) {
      ret = data;
    }
  })
  return ret;
}
