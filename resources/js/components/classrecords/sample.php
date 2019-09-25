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
          <th v-for="(cc,i) in classlists.classrecords.titles" :key="i">
            <strong>{{cc.classrecords[0].titles}}</strong>
          </th>
          <th>Total</th>
          <th>1st Grading</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th colspan="4" class="text-center bg-primary">Male</th>
          <td
            v-for="(labScore,index) in classlists"
            :key="index"
          >{{labScore.classrecords[0].lab_score}}</td>
          <th></th>
          <td></td>
        </tr>

        <!-- ./ first row  -->

        <tr
          v-for="(classlist,index) in classlists"
          :key="'labm'+ classlist.id"
          v-show="classlist.gender ==='male'"
        >
          <td>{{classlist.id}}</td>
          <td></td>
          <td>{{classlist.student}}</td>
          <td>{{classlist.course}}</td>
          <td v-for="(labStudentScore,i) in classlists" :key="i">
            {{labStudentScore.classrecords[0].lab_student_scores}}
            <!-- [{{index}} , {{i}}] -->
          </td>

          <td></td>
        </tr>
        <!-- ./MALE -->
        <tr>
          <th colspan="4" class="text-center bg-primary">Female</th>
          <td v-for="(overAllScore,index) in overAllScores" :key="index">
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
          <td v-for="(labStudentScore,i) in labStudentScores" :key="i">
            <input v-model="labStudentScore.studentScores[index]" name="labStudentScore" />
          </td>

          <td></td>
        </tr>
        <!-- ./FEMALE -->
      </tbody>
    </table>




































    <template>
  <div class="container">
    <h1>Lab</h1>
    <router-link to="/addScore">add score</router-link>
    <router-link to="/edit">edit</router-link>
    <table border="1" class="text-center table-hover bg-white">
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
          <th v-for="(cc,i) in classlists" :key="i">&nbsp;{{cc.classrecords[i].titles}}&nbsp;</th>
          <th>Total</th>
          <th>1st Grading</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th colspan="4" class="text-center bg-primary">Male</th>
          <th
            v-for="(labScore,index) in classlists"
            :key="index"
          >{{labScore.classrecords[index].lab_score}}</th>
          <th></th>
          <td></td>
        </tr>

        <!-- ./ first row  -->

        <tr v-for="(c,i) in classlists" :key="'labm'+ c.id" v-show="c.gender ==='male'">
          <td>{{c.id}}</td>
          <td></td>
          <td>{{c.student}}</td>
          <td>{{c.course}}</td>
          <td
            v-for="(n,x) in c.classrecords.length"
            :key="x"
          >{{c.classrecords[x].lab_student_scores}}</td>

          <td></td>
        </tr>
        <!-- ./MALE -->
        <tr>
          <th colspan="4" class="text-center bg-primary">Female</th>
          <th
            v-for="(labScore,index) in classlists"
            :key="index"
          >{{labScore.classrecords[index].lab_score}}</th>
          <th>{{overAllScores}}</th>
          <td></td>
        </tr>

        <!-- ./ first row  -->

        <tr v-for="(c,i) in classlists" :key="'labf'+ c.id" v-show="c.gender ==='female'">
          <td>{{i}}</td>
          <td></td>
          <td>{{c.student}}</td>
          <td>{{c.course}}</td>
          <td
            v-for="(n,x) in c.classrecords.length"
            :key="x"
          >{{c.classrecords[x].lab_student_scores}}</td>
          <td></td>
        </tr>
        <!-- ./FEMALE -->
        <tr>
          <th colspan="4" class="text-center">Date</th>
          <th class="relative" v-for="(cc,i) in classlists" :key="i">
            <p class="text-danger InVertAlign">&nbsp;{{cc.classrecords[i].date}}&nbsp;</p>
          </th>
        </tr>
        <!-- ./DATE -->
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  data() {
    return {
      labStudentScores: [],
      titles: [],
      overAllScores: [],
      studentId: [],
      classlists: [],
      dates: ""
    };
  },
  methods: {
    displayClasslists() {
      this.$Progress.start();
      axios
        .get(`/api/labview/${this.$route.params.placeName}`)
        .then(({ data }) => {
          this.classlists = data;
          this.$Progress.finish();
        });
    }
  },
  computed: {
    uScore() {
      for (let index = 0; index < this.classlists.length; index++) {
        let sum = null;
        const element = this.classlists[index].classrecords;
        element.forEach(element => {
          sum += element.lab_score;
        });
        console.log(sum);
      }
    }
  },

  created() {
    this.displayClasslists();
  }
};
</script>

<style scoped>
.relative {
  position: relative;
  height: 100px;
  /* border: 3px solid #73ad21; */
}
.InVertAlign {
  transform: rotate(-90deg);
  position: absolute;
  top: 35px;
  left: -45px;
  width: 120px;
  margin-left: 0;
}
</style>