<template>
  <div class="container">
    <h1>Subjects</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Subject Code</th>
          <th scope="col">Title</th>
          <th scope="col">Section</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>
            <router-link to="#">WEBPRG1</router-link>
          </td>
          <td>Web Programming 1</td>
          <td>
            <router-link to="classrecord">IDC1</router-link>
            <router-link to="classrecord">IDC2</router-link>
            <router-link to="classrecord">IDA1</router-link>
          </td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>
            <router-link to="#">PS2</router-link>
          </td>
          <td>Project Study 2</td>
          <td>
            <router-link to="classrecord">IDC1</router-link>
            <router-link to="classrecord">IDC2</router-link>
            <router-link to="classrecord">IDA1</router-link>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>