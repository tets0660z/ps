<template>
  <div>
    <div class="mb-2">
      <button type="button" @click="addQuiz" v-bind:title="quizMessage">quiz(+)</button>
      <button type="button" @click="OT" v-tooltip="otMessage">OT(+)</button>
      <input type="text" placeholder="Search" />
    </div>
    <table border="1" class="table-hover">
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
            x
            <input v-model="otherTitle.value" class="quiz d-flex" />
          </th>
          <th>OT</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4" class="text-center">Male</td>
          <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
            <input v-model="overAllScore.value" class="quiz d-flex" />
          </td>
          <td></td>
        </tr>
        <tr v-for="classlist in classlists" :key="classlist.id" v-show="classlist.gender ==='male'">
          <td></td>
          <td></td>
          <td>
            <span>{{classlist.student}}</span>
          </td>
          <td>{{classlist.course}}</td>
          <td v-for="(labStudentScore,index) in form.labStudentScores" :key="index">
            <input v-model="labStudentScore.value" class="quiz d-flex" />
          </td>
          <td>{{totalScore}}</td>
        </tr>

        <!-- MALE -->

        <tr>
          <td colspan="4" class="text-center">Female</td>
          <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
            <input v-model="overAllScore.value" class="quiz d-flex" />
          </td>
          <td></td>
        </tr>
        <tr
          v-for="classlist in classlists"
          :key="'lec'+classlist.id"
          v-show="classlist.gender ==='female'"
        >
          <td></td>
          <td></td>
          <td>
            <span>{{classlist.student}}</span>
          </td>
          <td>{{classlist.course}}</td>
          <td v-for="(labStudentScore,index) in form.labStudentScores" :key="index">
            <input v-model="labStudentScore.value" class="quiz d-flex" />
          </td>
          <td>{{totalScore}}</td>
        </tr>

        <!-- ./FEMALE -->
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  props: ["classlists"],
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
      quizMessage: " Click to add Quiz",
      students: "",
      totalScore: 0
    };
  },

  methods: {
    insertLecture() {
      this.form.post("api/lecture");
    },
    addQuiz: function() {
      this.form.quizzes.push({ value: [] });
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