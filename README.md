PyramidPHP
==========

### PyramidPHP presents alternative concept of connecting packages together for building realiable projects without dependency chaos.

---

#### PyramidPHP emphasizes importance of customized for specific needs - and locked if works properly - project dependencies resolution.

This means it allows you to do your work if you want link dependencies in a non-constrained way (warning you about it but assuming
you are a responsible developer and supporting you by providing out-of-box testing tools to verify you expectations). Furthermore,
it lets you to capture and consolidate your dependency tree/s by packing them into .phar files and by that allowing you to store them 
in a change-resistant solid manner without managing and tracking changes in bloated and obscure .lock files.

---

#### PyramidPHP emphasizes importance of well designed functional and integration tests to ensure that the software you create while depending on third-party open-source libraries is working as it meant to be.

This means it focuses on tests coverage and tests quality checks when decides about how properly connected and suited your 
software packages are. Furthermore it aims to give you green light or warn you about dependency changes you want to conduct.

---

PyramidPHP is against of resolving whole project dependencies at once based strictly and naively on package-maintainer provided constraints. It is against of taking steerwheel away from end developer to compose its own software based on his needs if its 
desired. Yet it puts package-provided dependency constraints as first in queue to provide fully functional package resolution,
though it does not stop there independently of results - aiming to give feedback about libraries compliance based on provided best 
possible integration tests. PyramidPHP prevents you from getting stuck in impossible to resolve version constraints never ending circle or forcing you to update well performing, production tested and already widely used in project dependency because of update or addition in minor package, which can ruin your construction.

---

#### Most importantly - PyramidPHP:
1. Does not assume that open-source packages provides always correct and realiable versioning and constraints - yet it look at
   it first.
2. Aims to provide realiable answer about package compliance based on functional tests wrote to check integrated functions.
3. Does not rush you to update your packages nor does not execute unexpectable side-effected multiple-dependency updates which
   might cause to broken project or hidden upredicted changes in behaviour.
4. Gives you ability to freeze more than one dependency tree into .phar file/s, in most dissipated scenario - one .phar file
   for each and every package your project explicitly depends on - offering the possibility to have one library in more than one 
   version in one project - if any of yours explicitly defined dependencies need it that way.
   
---
#### Instead of keeping house of cards untouched - build with pyramid!
