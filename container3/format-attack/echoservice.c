#include <stdio.h>

void echo() {
    size_t bufsize = 100;
    char contents[bufsize];

    fgets(contents, bufsize, stdin);
    printf(contents);
}

int main(int argc, char **argv) {
    setvbuf(stdout, NULL, _IONBF, 0);
    setvbuf(stdin, NULL, _IONBF, 0);

    while (1)
        echo();
}
