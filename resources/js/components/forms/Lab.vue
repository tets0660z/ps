<template>
  <div>
    <div class="mb-2">
      <label for="score">Add Score:</label>
      <button type="button" @click="addScore">FG(+)</button>
    </div>

    <form @submit.prevent="insertScore">
      <table border="1" class="table-hover">
        <thead>
          <tr>
            <th colspan="4"></th>
            <th>
              <!-- <button @click="removeScore">-</button> -->
            </th>
          </tr>
          <tr>
            <th>#</th>
            <th>ID Number</th>
            <th>Name</th>
            <th>Course</th>
            <th v-for="(title,index) in form.titles" :key="index">
              <input v-model="title.titles" class="quiz d-flex" />
            </th>
            <th>Total</th>
            <th>1st Grading</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th colspan="4" class="text-center bg-primary">Male</th>
            <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
              <input v-model="overAllScore.underScore" class="quiz d-flex" name="labScore" />
            </td>
            <th>{{overAllScores}}</th>
            <td></td>
          </tr>

          <!-- ./ first row  -->

          <tr
            v-for="(classlist,index) in classlists"
            :key="'labm'+ classlist.id"
            v-show="classlist.gender ==='male'"
          >
            <td>
              <input type="text" v-model="classlist.id" />
            </td>
            <td></td>
            <td>
              {{classlist.student}}
              <input type="text" v-model="classlist.id" hidden />
            </td>
            <td>{{classlist.course}}</td>
            <td v-for="(labStudentScore,i) in form.labStudentScores" :key="i">
              <input v-model="labStudentScore.studentScores[index]" name="student_scores" />
              <!-- [{{index}} , {{i}}] -->
            </td>

            <td>{{studentTotalScores[index]}}</td>
          </tr>
          <!-- ./MALE -->
          <tr>
            <th colspan="4" class="text-center bg-primary">Female</th>
            <td v-for="(overAllScore,index) in form.overAllScores" :key="index">
              <input v-model="overAllScore.underScore" class="quiz d-flex" name="over_all_scores" />
            </td>
            <th>{{overAllScores}}</th>
            <td></td>
          </tr>

          <!-- ./ first row  -->

          <tr
            v-for="(classlist,index) in classlists"
            :key="'labf'+ classlist.id"
            v-show="classlist.gender ==='female'"
          >
            <td>{{index +1}}</td>
            <td></td>
            <td>{{classlist.student}}</td>
            <td>{{classlist.course}}</td>
            <td v-for="(labStudentScore,i) in form.labStudentScores" :key="i">
              <input v-model="labStudentScore.studentScores[index]" name="labStudentScore" />
              <!-- [{{index}} , {{i}}] -->
            </td>

            <td>{{studentTotalScores[index]}}</td>
          </tr>
          <!-- ./FEMALE -->
        </tbody>
      </table>
      <button type="submit">save</button>
    </form>
    <div class="row">
      <div class="col-lg-6">Legend</div>
      <div class="col-lg-6">
        <!-- <Accordion></Accordion> -->
      </div>
    </div>
  </div>
</template>

<script>
import Transmutation from "./Transmutation";
import Accordion from "./Accordion";
export default {
  props: ["classlists", "instructor_id"],
  components: {
    Transmutation,
    Accordion
  },
  data() {
    return {
      form: new Form({
        labStudentScores: [],
        titles: [],
        overAllScores: [],
        studentId: [],
        instructorId:this.instructor_id
      })
    };
  },
  create() {
    console.log(this.userId);
  },

  computed: {
    displayScores() {
      axios
        .get("/api/classlists/" + this.$route.params.placeName)
        .then(({ data }) => (this.classlists = data));
    },
    studentTotalScores: function() {
      return this.classlists.map((c, index) => {
        return this.form.labStudentScores.reduce((acc, item) => {
          const value = parseInt(item.studentScores[index], 10) || 0;
          return acc + value;
        }, 0);
      });
    },
    overAllScores: function() {
      return this.form.overAllScores.reduce(
        (acc, item) => acc + parseInt(item.underScore, 10) || 0,
        0
      );
    },

    studentTotal: function() {
      return parseInt(this.form.studentExam) + this.studentTotalScores;
    }
  },
  methods: {
    insertScore() {
      const elements = this.classlists.map(e => e.id);
      this.form.studentId = elements;
      this.form.post("/api/lab");
    },
    addScore: function() {
      this.form.labStudentScores.push({ studentScores: [] });
      this.form.titles.push({ titles: [] });
      this.form.overAllScores.push({ underScore: [] });
    }
  }
};
</script>

<style scoped>
.legend {
  border: 0;
  background-color: transparent;
  font-family: "Times New Roman";
}

input {
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