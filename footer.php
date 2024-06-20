</div>

<script>
$(document).ready(function(){
  $('.edit').on('click',function(){
    $('#editupdate').modal('show');
      $tr = $(this).closest(tr);
      var data=$tr.children("td").map(function(){
        return $(this).text();
      }).get();

      $('#update_id').val(data[0]);
      $('#fname').val(data[1]);
      $('#age').val(data[2]);
      $('#gender').val(data[3]);
      $('#dept').val(data[4]);
      $('#salary').val(data[5]);

  });
});

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>