<template>
  <div>
    <div class="mb-2">
      <button type="button" @click="addQuiz" v-bind:title="quizMessage">quiz(+)</button>
      <button type="button" @click="OT" v-tooltip="otMessage">OT(+)</button>
      <input type="text" placeholder="Search" />
    </div>
    <table border="1">
      <thead>
        <tr>
          <th>#</th>
          <th>ID Number</th>
          <th>Name</th>
          <th>Course</th>
          <th v-for="(title,index) in form.titles" :key="index">
            <input v-model="title.value" class="quiz d-flex" />
          </th>
          <th>QT</th>
          <th v-for="(otherTitle,id) in form.otherTitles" :key="id">
            <input v-model="otherTitle.value" class="quiz d-flex" />
          </th>
          <th>OT</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4" class="text-center">male</td>
          <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
            <input v-model="overAllScore.value" class="quiz d-flex" />
          </td>
          <td></td>
        </tr>
        <tr>
          <th>1</th>
          <td>20111380</td>
          <td>Terence Ralph C. Raga-as</td>
          <td>BSIT</td>
          <td v-for="(quiz,index) in form.quizzes" :key="index">
            <input v-model="quiz.value" class="quiz d-flex" />
          </td>
          <td>{{totalQuiz}}</td>
          <td v-for="(otherTitle,id) in form.otherTitles" :key="id">
            <input v-model="otherTitle.value" class="quiz d-flex" />
          </td>
        </tr>
        <!-- <tr>
          <td colspan="4"></td>
          <td v-for="(date,id) in form.dates" :key="id">
            <input v-model="date.value" class="d-flex" type="date" />
          </td>
        </tr>-->
      </tbody>
    </table>
    <button type="submit">save</button>

    <table border="1" class="my-3">
      <thead>
        <tr>
          <th colspan="2" class="tex-center">Legend:</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(title,index) in form.titles" :key="index">
          <td>{{title.value}}</td>
          <td>
            <input type="text" class="legend" />
          </td>
        </tr>
      </tbody>
    </table>
    <form @submit.prevent="insertLecture">
      <!-- <div class="form-group">
        <label>title</label>
        <input v-model="form.title" type="text" name="title" id="title" />
        <label>description</label>
        <input v-model="form.description" type="text" name="description" id="description" />
      </div>
      <button type="submit" class="btn btn-primary">save</button>-->
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        title: "",
        description: "",
        quizzes: [],
        otherTitles: [],
        titles: [],
        overAllScores: [],
        dates: []
      }),
      otMessage:
        "Other Class Standing\nSIT Faculty:\nRequirement: \nat least 3 other class standings per grading.",
      quizMessage: " Click to add Quiz"
    };
  },
  methods: {
    insertLecture() {
      this.form.post("api/lecture");
    },
    addQuiz: function() {
      this.form.quizzes.push({ value: "" });
      this.form.titles.push({ value: "" });
      this.form.overAllScores.push({ value: "" });
      this.form.dates.push({ value: "" });
    },
    OT: function() {
      this.form.otherTitles.push({ value: "" });
    }
  },
  computed: {
    totalQuiz() {
      return this.form.quizzes.reduce(
        (acc, item) => acc + parseInt(item.value),
        0
      );
    }
  },
  overAllQuiz() {
    return this.form.overAllScores.reduce(
      (acc, item) => acc + parseInt(item.value),
      0
    );
  }
};
</script>

<style scoped>
.legend {
  border: 0;
  background-color: transparent;
  font-family: "Times New Roman";
}

.quiz {
  width: 30px;
}
/* input[type="date"] {
  transform: rotate(-90deg);
} */
.btn-primary {
  width: 50px;
  height: 50px;
  padding: 10px;
}
</style>