<script setup>
import { RouterLink, RouterView } from "vue-router";
import HelloWorld from "./components/HelloWorld.vue";
</script>

<template>
  <header>
    <div class="wrapper">
      <nav>
        <RouterLink to="/">Home</RouterLink>
        <RouterLink to="/relatorio">Relatório</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style scoped>
  header {
    line-height: 1.5;
    max-width: 100wh;
  }

  nav {
    display: flex;
    width: 100%;
    font-size: 12px;
    text-align: center;
    background: var(--color-background-nav);
    color: white;
    text-align: left;
    font-size: 1rem;
    padding: 1rem 0;
  }

  nav a.router-link-exact-active {
    color: var(--color-text);
    color: white;
  }

  nav a.router-link-exact-active:hover {
    background-color: transparent;
  }

  nav a {
    display: inline-block;
    padding: 0 1rem;
    font-weight: 700;
    text-decoration: none;
    border-left: 1px solid var(--color-border);
    color: #a8a4ce;
  }
</style>
