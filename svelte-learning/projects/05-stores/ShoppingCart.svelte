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
