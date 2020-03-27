const searching = () => {

  const name = document.getElementById('name').value;
  const api_url = 'http://localhost:9000/agenda?name=' + name;

  fetch(api_url).then((result) => {
    var result_json = result.json();
    result_json.then((json) => {
      //PARSE JSON
      var data_agenda = json.data;

      //HTML
      var to_div = '';
      to_div += 'Message: ' + json.message + '<br>';
      if(typeof data_agenda.phone !== 'undefined'){
        to_div += 'Phone: ' + data_agenda.phone + '<br>';
        to_div += 'Birthday: ' + data_agenda.birthday + '<br>';
      }

      document.getElementById('result').innerHTML = to_div;
    })
  })
  return false;
}
