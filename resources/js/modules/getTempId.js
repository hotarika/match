export function tempId(date) {
   const tempId =
      date.getFullYear() +
      '' +
      date.getMonth() +
      '' +
      date.getDate() +
      '' +
      date.getHours() +
      '' +
      date.getMinutes() +
      '' +
      date.getSeconds() +
      '' +
      date.getMilliseconds();

   return tempId;
}
