// const date = new Date();

// module.exports =
//    date.getFullYear() + '/' + date.getMonth() + '/' + date.getDate() + ' ' + date.getHours() + ':' + date.getMinutes();

export function now(date) {
   const now =
      date.getFullYear() +
      '/' +
      date.getMonth() +
      '/' +
      date.getDate() +
      ' ' +
      date.getHours() +
      ':' +
      date.getMinutes();

   return now;
}
