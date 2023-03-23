function instantSearch() {
    document.querySelectorAll('.item').forEach(item => item.querySelectorAll('h2')[0].innerText.toLowerCase().indexOf(document.querySelector('#input').value.toLowerCase()) > -1 ? item.style.display = 'block' : item.style.display = 'none');
  }




  