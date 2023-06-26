@livewireScripts
</body>

<script>
    document.querySelector("header nav .fa-bars").addEventListener("click", () => {
        document.querySelector("header nav #navigation").classList.toggle("right");
        console.log("india");
    })

    function blur() {
        document.querySelector("nav #searchDropDown").style.display = "none";
    }
</script>

</html>
