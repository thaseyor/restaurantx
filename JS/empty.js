function empty(mixed_var) {
    return (
      mixed_var === "" ||
      mixed_var === 0 ||
      mixed_var === "0" ||
      mixed_var === null ||
      mixed_var === false
    );
  }