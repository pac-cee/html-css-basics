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
    }
</script>

<div class="counter">
    <h2>Counter Example</h2>
    
    <div class="display">
        <p>Count: {count}</p>
        <p>Doubled: {doubled}</p>
    </div>

    <div class="buttons">
        <button on:click={decrement}>-</button>
        <button on:click={reset}>Reset</button>
        <button on:click={increment}>+</button>
    </div>
</div>

<style>
