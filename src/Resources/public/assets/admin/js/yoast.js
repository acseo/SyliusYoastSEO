document.addEventListener('DOMContentLoaded', function () {
    const yoastButton = document.querySelector('.ui.large.blue.button'); // Sélectionner le bouton
    if (yoastButton) {
        yoastButton.addEventListener('click', function (event) {
            event.preventDefault();

            const productId = yoastButton.getAttribute('data-product-id'); // Récupérer l'ID du produit

            if (!productId) {
                alert("Product ID is missing.");
                return;
            }

            fetch(`/admin/yoast?productId=${productId}`, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                }
            })
                .then(response => response.text()) // Le backend renvoie un HTML
                .then(htmlContent => {
                    const yoastContainer = document.getElementById('yoast-container');
                    if (yoastContainer) {
                       // tester le text
                    }
                })
                .catch(error => {
                    console.error('Error loading Yoast content:', error);
                });
        });
    }
});
