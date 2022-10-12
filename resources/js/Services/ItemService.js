export async function addItem(item) {
    const response = await axios.post('/api/items', { product: item });

    return response.data;
}

export async function addProduct(productId) {
    const response = await axios.post('/api/items', { product_id: productId });

    return response.data;
}

export async function deleteItem(id) {
    const response = await axios.delete('/api/items/' + id);

    return response.data;
}
