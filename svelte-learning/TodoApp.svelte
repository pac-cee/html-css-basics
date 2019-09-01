<script>
  import TodoContext from './lib/TodoContext.svelte';
  import { getContext } from 'svelte';
  
  let newTodo = '';
  
  const { todos, add, remove, toggle } = getContext('todos');
</script>

<TodoContext>
  <div class="todo-app">
    <input 
      bind:value={newTodo}
      placeholder="What needs to be done?"
      on:keydown={e => {
        if (e.key === 'Enter' && newTodo) {
          add(newTodo);
          newTodo = '';
        }
      }}
    >
    
    {#each $todos as todo, i}
      <div class="todo-item">
        <input
          type="checkbox"
          checked={todo.done}
          on:change={() => toggle(i)}
        >
        <span class:done={todo.done}>{todo.text}</span>
        <button on:click={() => remove(i)}>×</button>
      </div>
    {/each}
  </div>
</TodoContext>

<style>
  .done {
