    <script src="<?=templates()?>/js/index.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>

    <script>
      var harga = document.getElementById('price');
      harga.addEventListener('input', function(evt) {
        var value = evt.target.value;
        value = value.replace(/[^\d]/g, "");
        value = value.replace(/(\d)(\d{2})$/, '$1.$2');
        evt.target.value = value;
      });
    </script>
