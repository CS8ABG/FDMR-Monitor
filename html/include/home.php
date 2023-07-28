<div class="container">
    <p id="main"></p>
</div>
<!-- this checks if id="main" as content -->
<script>
  window.addEventListener('load', function () {
    setInterval(checkMainContent, 5000);
  });

  function checkMainContent() {
    var mainElement = document.getElementById('main');
    if (mainElement && mainElement.innerHTML.trim() !== '') {
      // console.log('OKAY');
    } else {
      //console.log('NotOK');
      location.reload();
    }
  }
</script>