fetch('api/products.php')
  .then(res => res.json())
  .then(data => {
    const list = document.getElementById('product-list');
    data.forEach(product => {
      const div = document.createElement('div');
      div.className = 'product';
      div.innerHTML = `
        <img src="${product.image}" alt="${product.name}">
        <h3>${product.name}</h3>
        <p>Price: $${product.price}</p>
        <button>Add to Cart</button>
      `;
      list.appendChild(div);
    });
  });
