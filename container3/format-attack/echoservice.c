// Compile on debian buster with libc-2.28

#include <stdio.h>

void echo() {
    size_t bufsize = 100;
    char contents[bufsize];

    fgets(contents, bufsize, stdin);
    printf(contents);
}

int main(int argc, char** argv) {
    setvbuf(stdout, NULL, _IONBF, 0);
    setvbuf(stdin, NULL, _IONBF, 0);
    setresuid(geteuid(), geteuid(), geteuid());

    while (1)
        echo();
}
