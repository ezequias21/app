<template>
  <div class="container mt-4">
    
    <h6 class="inline-block"> <Square />Colaboradores com salário errado</h6>
    <table class="table table-striped mt-4">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Colaborador</th>
          <th scope="col">Salário</th>
          <th scope="col">Diferença</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="colaborador in listagem.colaboradores_salario_errado"
          :key="colaborador.id"
        >
          <td>{{ colaborador.id }}</td>
          <td>{{ colaborador.nome }}</td>
          <td>{{ colaborador.salario }}</td>
          <td>{{ colaborador.diferenca }}</td>
        </tr>
      </tbody>
    </table>

      <h6 class="mt-4"><Square />Diferença entre o valor total da folha de referência e o valor da folha que foi enviada pela empresa especializada</h6>
      <span class="resultado">{{ listagem.diferenca_valor_total }}</span>

      <h6 class="mt-4"><Square />Diferença média entre os valores da folha de referência e os valores da folha enviada pela empresa especializada</h6>
      <span class="resultado">{{ listagem.diferenca_media }}</span>
  </div>
</template>

<script>
import Square from '../components/Square.vue'
import axios from "../services/axios";
export default {
  components : {
    Square
  },
  data() {
    return {
      listagem: [],
    };
  },
  created() {
    axios.get("relatorio").then((response) => {
      console.log(response.data);
      this.listagem = response.data;
    });
  },
};
</script>

<style>
.resultado{
  display: inline-block;
  padding: 10px;
  border-bottom: 2px solid #C8B6E2;
}
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
