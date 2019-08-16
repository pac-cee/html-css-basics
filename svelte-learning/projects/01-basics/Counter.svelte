# Counter.svelte
<script>
    // Reactive variable
    let count = 0;

    // Reactive declaration
    $: doubled = count * 2;

    // Methods
    function increment() {
        count += 1;
    }

    function decrement() {
        count -= 1;
    }

    function reset() {
        count = 0;
