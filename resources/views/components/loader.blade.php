<style>
    .loader {
        border-top-color: rgb(29 78 216 / var(--tw-text-opacity));
        -webkit-animation: spinner 1.5s linear infinite;
        animation: spinner 1.5s linear infinite;
    }

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spinner {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div id="loader" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800">
    <div class="loader ease-linear  rounded-full border-8 border-t-8 h-56 w-56"></div>
</div>
<script>
    window.addEventListener('load', function() {
        var loader = document.getElementById('loader');
        if (loader) {
            loader.style.display = 'none';
        }
    });
</script>
