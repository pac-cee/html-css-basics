<script>
    import { cart, cartTotal, theme } from './stores.js';

    let newItem = { name: '', price: 0, quantity: 1 };

    function addToCart() {
        if (newItem.name && newItem.price > 0) {
            cart.update(items => [...items, { ...newItem }]);
            newItem = { name: '', price: 0, quantity: 1 };
        }
    }

    function removeItem(index) {
        cart.update(items => items.filter((_, i) => i !== index));
    }

    function toggleTheme() {
        theme.update(t => t === 'light' ? 'dark' : 'light');
    }
</script>

<div class="shopping-cart" class:dark={$theme === 'dark'}>
    <h2>Shopping Cart Example</h2>
    
    <button class="theme-toggle" on:click={toggleTheme}>
        Toggle Theme
    </button>

    <div class="add-item">
        <input 
            type="text" 
            bind:value={newItem.name} 
            placeholder="Item name"
        >
        <input 
            type="number" 
            bind:value={newItem.price} 
            placeholder="Price"
