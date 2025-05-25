document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('product-search');
    const resultsContainer = document.getElementById('search-results');

    input.addEventListener('input', async () => {
        const query = input.value.trim();
        if (query.length < 2) {
            resultsContainer.innerHTML = '';
            return;
        }

        try {
            const response = await fetch(`/search-products.php?q=${encodeURIComponent(query)}`);
            const data = await response.json();

            resultsContainer.innerHTML = ''; 

            if (data.length === 0) {
                resultsContainer.innerHTML = '<p>Ничего не найдено</p>';
                return;
            }

            data.forEach(product => {
                const link = document.createElement('a');
                link.href = `/product.php?id=${product.id}`;
                link.textContent = `${product.name} — ${product.subtitle}`;
                link.style.display = 'block'; 
                link.style.margin = '5px 0';
                resultsContainer.appendChild(link);
            });

        } catch (error) {
            console.error('Ошибка при получении данных:', error);
        }
    });
});