#include <stdio.h>
#include <string.h>
#include <unistd.h>

void readFile(char *file) {
    FILE *fp;
    char ch;

    char cwd[128];
    if (getcwd(cwd, sizeof(cwd)) == NULL) {
        return;
    }
    strcat(cwd, file);

    if ((fp = fopen(cwd, "r")) == NULL) {
        puts("HTTP/1.1 404 Not found\n");
        printf("%s not found\n", file);
        return;
    }

    puts("HTTP/1.1 200 OK");
    puts("Server: Http Server written in C\n");
    while ((ch = fgetc(fp)) != EOF) {
        printf("%c", ch);
    }
}

int main(int argc, char *argv[]) {
    char buffer[256];
    gets(buffer);

    char file[64] = {0};
    sscanf(buffer, "GET %s", file);

    if (file[0] == '\0') {
        puts("HTTP/1.1 500 Internal Server Error\n");
        puts("Something went wrong");
        return 0;
    }

    readFile(file);

    return 0;
}
