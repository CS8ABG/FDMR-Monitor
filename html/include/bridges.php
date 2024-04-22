<div class="container">
  <p id="bridge"></p>
</div>

<!-- this checks if id="opb" as content -->
<script>
  window.addEventListener('load', function () {
    setInterval(checkMainContent, 5000);
  });

  function checkMainContent() {
    var mainElement = document.getElementById('bridge');
    if (mainElement && mainElement.innerHTML.trim() !== '') {
      // console.log('OKAY');
    } else {
      //console.log('NotOK');
      location.reload();
    }
  }
</script>