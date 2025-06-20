<footer class="tm-footer text-center">
    <p>Copyright &copy; 2020 Simple House

        | Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/parallax.min.js"></script>
<script>
    $(document).ready(function(){
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function(){
        // Handle click on paging links
        $('.tm-paging-link').click(function(e){
            e.preventDefault();

            var page = $(this).text().toLowerCase();
            $('.tm-gallery-page').addClass('hidden');
            $('#tm-gallery-page-' + page).removeClass('hidden');
            $('.tm-paging-link').removeClass('active');
            $(this).addClass("active");
        });
    });
</script>
<script>
    function toggleEditForm(ID) {
        var form = document.getElementById("edit-form-"+ ID);
        if (form.style.display === "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
</script>
<script>
    function toggleAddForm() {
        var form = document.getElementById("add-form");
        form.style.display = (form.style.display === "none") ? "block" : "none";
    }
</script>

