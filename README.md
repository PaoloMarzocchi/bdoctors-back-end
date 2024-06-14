## Git's steps ##

- Enter inside a Bash-terminal
- `git checkout dev`
- Inside terminal you will see `(dev)` 
- `git pull`
- `git checkout -b 1-fix-something`
- Work to your issue
- `git add .`
- `git commit -m"fix the something you need"`
- `git push`
- Copy what terminal say about git push and paste it
- `git push --set-upstream origin 1-fix-something`
- Enter GitHub and go into Paolo's project
- Pull Requests window
- Compare & pull requests
- ⚠ select to merge your branch (right) to the "dev" branch (left) instead of "main" setted as default ⚠
- Take care if there are problems to about merge
- Merge branches
- Delete the branch

## Git's steps to undo a merge commit ##

- Enter inside a Bash-terminal
- Run `git reflog` to see the hashes of commits
- Use `git revert` command to create a new commit that undoes the changes made by a specific commit
- Adding the option `-m 1` to the git revert command tells Git that you want to keep the branch you merged into. If you want to keep the side of the branch merged, you change `1` to `2`. 
- Revert the merge commit by running `git revert -m 1 <merge-commit-hash>`